<header class="header">
    <div>
        <button class="toggle-btn me-2.5" id="toggleSidebar" aria-expanded="false" aria-controls="sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <a title="home" href="{{url('/')}}"> Jester Syst</a>
    </div>
    <div class="icons-container">
        <a title="home" href="{{url('/')}}"><i class="fas fa-home d-block"></i></a>
        <i class="fas fa-bell"></i>
        <i class="fas fa-envelope"></i>
        <i class="fas fa-cog"></i>
        <i class="fas fa-user"></i>
        <a title="sign out" href="/userLogout"><i class="fas fa-sign-out-alt d-block"></i></a>
    </div>
</header>

<style>
    /* Header Styles */
    .header {
        background: #333;
        color: white;
        position: sticky;
        top: 0;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;
        z-index: 2001;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .toggle-btn {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        z-index: 2002;
        position: relative;
    }

    .icons-container {
        display: flex;
        gap: 15px;
    }

    .icons-container i {
        cursor: pointer;
    }
</style>
