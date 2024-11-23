// Function to confirm order deletion
function confirmDeleteOrder() {
    if (confirm("Are you sure you want to delete this order?")) {
      // Place logic here to delete the order (e.g., AJAX request to the server)
      alert("Order deleted successfully!");
    }
  }

  // Sample data for daily statistics (replace with dynamic data)
  document.getElementById("ordersToday").textContent = 5;  // Example: 5 orders today
  document.getElementById("revenueToday").textContent = "$500.00";  // Example: $500 revenue today