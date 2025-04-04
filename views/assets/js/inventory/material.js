document.addEventListener('DOMContentLoaded', function() {
  const showOutOfStockCheckbox = document.getElementById('show-out-of-stock-checkbox');
  const tableRows = document.querySelectorAll('tbody tr');

  showOutOfStockCheckbox.addEventListener('change', function() {
      const showOutOfStock = this.checked;

      tableRows.forEach(row => {
          // Skip the "No materials found" row
          if (row.querySelector('td[colspan="8"]')) {
              return;
          }

          const quantity = parseInt(row.querySelector('td:nth-child(4)').textContent);
          const isOutOfStock = quantity === 0;

          if (showOutOfStock) {
              // Show only out-of-stock items
              row.style.display = isOutOfStock ? '' : 'none';
          } else {
              // Show all items
              row.style.display = '';
          }
      });
  });
});

