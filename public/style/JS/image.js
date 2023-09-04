let links = document.querySelectorAll('[data-delete]');

// boucle sur les liens
for(let link in links) {
  // On met un écouteur d'évènements
  link.addEventListener("click", function(e) {
      // On empêche la navigation
      e.preventDefault();

      // On demande confirmation
      if(confirm("Voulez-vous supprimer cette image ?")) {
        // On envoi la requête ajax
        fetch(this.getAttribute("href"), {
          method: "DELETE",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-type": "application/json"
          },
          body: JSON.stringify({"_token": this.dataset.token})
        }).then(response => response.json())
        .then(data => {
          if(data.success) {
              this.parentElement.remove();
          }else {
            alert(data.error);
          }
        })
      }
  });
}