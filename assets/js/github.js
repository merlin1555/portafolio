// URL de la API de GitHub
/*
const apiUrl = "https://api.github.com/repos/merlin1555/portafolio/languages";

// Obtener referencia al elemento donde se mostrarán los lenguajes
const languagesElement = document.getElementById("languages");

// Realizar la solicitud GET a la API
fetch(apiUrl)
  .then(response => { if (!response.ok) { throw new Error(`Error al obtener los datos: ${response.status} - ${response.statusText}`); } return response.json(); })
  .then(data => { const totalBytes = Object.values(data).reduce((acc, cur) => acc + cur, 0);
    let htmlContent = "<article>";
    for (const language in data) { 
        const percentage = ((data[language] / totalBytes) * 100).toFixed(1); 
        htmlContent += `<span>${language}: ${percentage}%</span>`; }
    htmlContent += "</article>";
    languagesElement.innerHTML = htmlContent; }) .catch(error => { console.error("Error:", error);
    languagesElement.textContent = "Error al obtener los datos. Por favor, intenta nuevamente más tarde.";
}); */