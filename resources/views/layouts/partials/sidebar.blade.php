<aside class="sidebar">
    <div class="sidebar-brand"><a href="/">Jester</a></div>
    <ul>
        <li>
            <a href="#">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="submenu">
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/users" class="{{ Request::is('users') ? 'active' : '' }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}"><i class="fas fa-shop"></i> Products</a></li>
                <li><a href="/categories" class="{{ Request::is('categories') ? 'active' : '' }}"><i class="fas fa-box"></i> Categories</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-users"></i> Users
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="submenu">
                <li><a href="/users" class="{{ Request::is('users') ? 'active' : '' }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}"><i class="fas fa-shop"></i> Products</a></li>
                <li><a href="/categories" class="{{ Request::is('categories') ? 'active' : '' }}"><i class="fas fa-box"></i> Categories</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-shop"></i> Products
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="submenu">
                <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}"><i class="fas fa-shop"></i> Products</a></li>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/users" class="{{ Request::is('users') ? 'active' : '' }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="/categories" class="{{ Request::is('categories') ? 'active' : '' }}"><i class="fas fa-box"></i> Categories</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-box"></i> Categories
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="submenu">
                <li><a href="/categories" class="{{ Request::is('categories') ? 'active' : '' }}"><i class="fas fa-box"></i> Categories</a></li>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/users" class="{{ Request::is('users') ? 'active' : '' }}"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}"><i class="fas fa-shop"></i> Products</a></li>
            </ul>
        </li>
    </ul>
</aside>

<style>
   /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background: linear-gradient(135deg, #333 0%, #222 100%);
        color: white;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        transition: transform 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
        z-index: 2000; /* Match mobile z-index */
        transform: translateX(-100%);
        overflow-y: auto;
    }

    .sidebar.expanded {
        transform: translateX(0);
    }

    .sidebar-brand {
        padding: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        z-index: 2001; /* Above sidebar */
    }

    .sidebar ul {
        list-style: none;
    }

    .sidebar ul li a {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        color: white;
        text-decoration: none;
        transition: background 0.3s ease;
        position: relative;
        z-index: 2001; /* Ensure links are clickable */
        pointer-events: auto;
    }

    .sidebar ul li a.active {
        background: rgb(36, 1, 1);
    }

    .sidebar ul li a:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar ul li a i {
        margin-right: 10px;
    }

    .dropdown-icon {
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    .sidebar ul li.open .dropdown-icon {
        transform: rotate(180deg);
    }

    .submenu {
        max-height: 0;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.2);
        padding-left: 20px;
        opacity: 0;
        transform: translateY(-10px);
        transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.3s ease,
                    transform 0.3s ease;
        z-index: 2001; /* Ensure submenu is above overlay */
    }

    .sidebar ul li.open .submenu {
        max-height: 200px;
        opacity: 1;
        transform: translateY(0);
    }

    .submenu li a {
        padding: 10px 20px;
        font-size: 0.9rem;
        z-index: 2001;
        position: relative;
        pointer-events: auto;
    }
</style>
