<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Ticket Counter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4 text-center">Hotel Ticket Counter</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-center">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold mb-2">Today's Record ({{ $ticket->date }})</h2>
            <p class="text-5xl font-bold">{{ $ticket->count }}</p>
            <p class="text-lg text-gray-600 mt-2">Revenue: <strong>{{ $ticket->revenue }} Tk</strong></p>

            <div class="mt-4 flex justify-center gap-4">
                <form action="{{ route('tickets.take') }}" method="POST">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Take Ticket</button>
                </form>
                <form action="{{ route('tickets.reset') }}" method="POST">
                    @csrf
                    <button class="bg-red-100 text-red-700 px-4 py-2 rounded">Reset Today</button>
                </form>
            </div>
        </div>

        <hr class="my-6">

        <h3 class="text-lg font-semibold mb-2">History</h3>
        <table class="w-full text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2 border">Date</th>
                    <th class="px-3 py-2 border">Count</th>
                    <th class="px-3 py-2 border">Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $r)
                    <tr>
                        <td class="px-3 py-2 border">{{ $r->date }}</td>
                        <td class="px-3 py-2 border">{{ $r->count }}</td>
                        <td class="px-3 py-2 border">{{ $r->revenue }} Tk</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
