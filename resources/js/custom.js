function copyLink() {
    const url = window.location.href; // Obtém a URL atual da página
    navigator.clipboard.writeText(url).then(() => {
        alert("Link copiado para a área de transferência!");
    }).catch(err => {
        console.error("Erro ao copiar o link: ", err);
    });
}