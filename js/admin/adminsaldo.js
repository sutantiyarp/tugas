document.getElementById("downloadBtn").addEventListener("click", function() {
    let table = document.querySelector("table");
    let rows = table.querySelectorAll("tr");
    let csv = [];
    
    // Loop through table rows
    rows.forEach(function(row) {
        let cells = row.querySelectorAll("th, td");
        let rowData = [];
        cells.forEach(function(cell) {
            rowData.push(cell.textContent.replace(/,/g, "")); // Remove commas
        });
        csv.push(rowData.join(","));
    });
    
    // Create CSV file
    let csvContent = csv.join("\n");
    let blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    let link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "riwayat_transaksi.csv";
    link.click();
});
