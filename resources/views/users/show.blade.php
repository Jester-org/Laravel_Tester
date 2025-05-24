<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">User Details</h1>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Name:</label>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email:</label>
            <p class="text-gray-900">{{ $user->email }}</p>
        </div>
        <div class="flex justify-end">
            <a href="{{ url('/users') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Users
            </a>
        </div>
    </div>
</body>
</html>