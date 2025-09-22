// Data storage keys
const STORAGE_KEYS = {
    BALITA: 'sipepo_balita_data',
    IBU_HAMIL: 'sipepo_ibu_hamil_data',
    LANSIA: 'sipepo_lansia_data'
};

// Function to save form data
function saveFormData(formType, data) {
    const existingData = JSON.parse(localStorage.getItem(formType) || '[]');
    data.timestamp = new Date().toISOString(); // Add timestamp
    existingData.push(data);
    localStorage.setItem(formType, JSON.stringify(existingData));
}

// Function to get all data for a form type
function getFormData(formType) {
    return JSON.parse(localStorage.getItem(formType) || '[]');
}

// Function to export data to Excel
function exportToExcel(formType) {
    const data = getFormData(formType);
    if (data.length === 0) {
        alert('Tidak ada data untuk diekspor');
        return;
    }

    // Convert data to worksheet format
    const ws = XLSX.utils.json_to_sheet(data);
    
    // Create workbook and append worksheet
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, formType);
    
    // Generate Excel file
    const fileName = `${formType}_${new Date().toISOString().split('T')[0]}.xlsx`;
    XLSX.writeFile(wb, fileName);
}

// When initializing, migrate any pra-lansia data to lansia if it exists
(function migratePraLansiaData() {
    const praLansiaData = JSON.parse(localStorage.getItem('sipepo_pralansia_data') || '[]');
    if (praLansiaData.length > 0) {
        const lansiaData = getFormData(STORAGE_KEYS.LANSIA);
        // Add all pra-lansia data to lansia data
        for (const data of praLansiaData) {
            // Mark it as migrated from pra-lansia
            data.migratedFromPralansia = true;
            lansiaData.push(data);
        }
        // Save the combined data
        localStorage.setItem(STORAGE_KEYS.LANSIA, JSON.stringify(lansiaData));
        // Clear the old pra-lansia data
        localStorage.removeItem('sipepo_pralansia_data');
    }
})();
