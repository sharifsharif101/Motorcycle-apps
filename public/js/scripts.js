 
// Wait for 3 seconds then hide the success message
setTimeout(function(){
    document.getElementById('successAlert').style.display = 'none';
}, 3000);
 
 
// Wait for 3 seconds then hide the success message
setTimeout(function(){
    document.getElementById('successAlert').style.display = 'none';
}, 3000);
 
 
      function confirmDelete(id) {
        if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
          document.getElementById('deleteForm_' + id).submit();
        }
      }
      
      function sortTable(columnIndex) {
        const table = document.querySelector("table tbody");
        const rows = Array.from(table.rows);
        const isAscending = table.getAttribute("data-sort-order") === "asc";
        const sortedRows = rows.sort((a, b) => {
          const aText = a.cells[columnIndex].innerText.trim();
          const bText = b.cells[columnIndex].innerText.trim();
          return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
        });
        table.setAttribute("data-sort-order", isAscending ? "desc" : "asc");
        while (table.firstChild) {
          table.removeChild(table.firstChild);
        }
        table.append(...sortedRows);
      }
 
 
      function confirmDelete(id) {
        if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
          document.getElementById('deleteForm_' + id).submit();
        }
      }
 