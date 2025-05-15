<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
  <div class="max-w-md w-full">
    <h1 class="text-3xl font-bold mb-6">Complete Payment</h1>

    <!-- Booking Summary -->
    <div class="bg-white border rounded-xl mb-6 shadow">
      <div class="border-b p-4">
        <h2 class="text-xl font-semibold">Booking Summary</h2>
        <p class="text-sm text-gray-500">Review your booking details</p>
      </div>
      <div class="p-4 space-y-2">
        <div class="flex justify-between">
          <span class="text-gray-500">Booking ID:</span>
          <span class="font-medium">123456</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-500">Court:</span>
          <span class="font-medium">Court 3</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-500">Date:</span>
          <span class="font-medium">2024-05-15</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-500">Time:</span>
          <span class="font-medium">18:00 - 19:00</span>
        </div>
        <div class="flex justify-between border-t pt-2 mt-2">
          <span class="font-medium">Total:</span>
          <span class="font-bold">$50.00</span>
        </div>
      </div>
    </div>

    <!-- Payment Form -->
    <div class="bg-white border rounded-xl shadow">
      <div class="border-b p-4">
        <h2 class="text-xl font-semibold">Payment Details</h2>
        <p class="text-sm text-gray-500">Enter your card information to complete payment</p>
      </div>
      <form class="p-4 space-y-4">
        <div class="space-y-2">
          <label for="name" class="block text-sm font-medium">Cardholder Name</label>
          <input type="text" id="name" name="name" placeholder="John Doe" required
                 class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <div class="space-y-2">
          <label for="number" class="block text-sm font-medium">Card Number</label>
          <input type="text" id="number" name="number" placeholder="1234 5678 9012 3456" required
                 class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <div class="grid grid-cols-3 gap-4">
          <div class="space-y-2">
            <label for="expMonth" class="block text-sm font-medium">Month</label>
            <select id="expMonth" name="expMonth"
                    class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300">
              <option value="">MM</option>
              <!-- Months 01–12 -->
              ${[...Array(12)].map((_, i) => {
                const val = String(i + 1).padStart(2, '0');
                return `<option value="${val}">${val}</option>`;
              }).join('')}
            </select>
          </div>

          <div class="space-y-2">
            <label for="expYear" class="block text-sm font-medium">Year</label>
            <select id="expYear" name="expYear"
                    class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300">
              <option value="">YY</option>
              <!-- Years 2024–2033 -->
              ${[...Array(10)].map((_, i) => {
                const year = new Date().getFullYear() + i;
                return `<option value="${String(year).slice(-2)}">${year}</option>`;
              }).join('')}
            </select>
          </div>

          <div class="space-y-2">
            <label for="cvc" class="block text-sm font-medium">CVC</label>
            <input type="text" id="cvc" name="cvc" placeholder="123" required
                   class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" />
          </div>
        </div>

        <div>
          <button type="submit"
                  class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition disabled:opacity-50">
            Pay $50.00
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
