const data = {
  userID: localStorage.getItem("userID"),
  wampStyle: localStorage.getItem("wampStyle"),
};

fetch("http://serverweb/server_script.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(data), // Envoie des données en JSON
})
  .then((response) => response.json())
  .then((data) => {
    console.log("Réponse du serveur:", data);
  })
  .catch((error) => {
    console.error("Erreur:", error);
  });
