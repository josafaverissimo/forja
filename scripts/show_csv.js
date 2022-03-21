function getCsvContent() {
    return fetch(`${baseUrl}/get_all_csv.php`)
        .then(response => response.json())
}

async function showCsvFiles() {
    const csvContent = await getCsvContent()
    const csvFilesContainer = document.getElementById("csv-files")

    csvFilesContainer.querySelectorAll('.csv-file-table').forEach(csvFileTable => csvFileTable.remove())

    Object.keys(csvContent).forEach(key => {
        const csvFilename = key
        const csvHeader = csvContent[key][0].split(',')
        const csvBody = csvContent[key].slice(1, csvContent[key].length)

        const csvTableBoilerplate = csvFilesContainer.querySelector('.csv-file-table-boilerplate').cloneNode(true)

        csvTableBoilerplate.querySelector('h1').textContent = csvFilename;

        csvHeader.forEach(cell => {
            const th = document.createElement('th')
            th.textContent = cell
            csvTableBoilerplate.querySelector('table thead tr').appendChild(th)
        })

        csvBody.forEach(row => {
            const tr = document.createElement('tr')

            row.split(',').forEach(cell => {
                const td = document.createElement('td')
                td.textContent = cell

                tr.appendChild(td)
            })

            csvTableBoilerplate.querySelector('table tbody').appendChild(tr)
        })

        csvFilesContainer.appendChild(csvTableBoilerplate)
        csvTableBoilerplate.setAttribute('class', 'csv-file-table')
        csvTableBoilerplate.removeAttribute('hidden')
    })
}