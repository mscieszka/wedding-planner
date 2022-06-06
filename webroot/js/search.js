function searchOffersByCityOrProvince() {
    let td, offerAddress;
    const searchInput = document.getElementById("input_search_place");
    const searchValue = searchInput.value.toLowerCase();
    const table = document.getElementById("offers-table");
    const tr = table.getElementsByTagName("tr");

    for (let i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByClassName("offer-address");
        offerAddress = td[0].innerHTML;
        if (td != null) {
            if (offerAddress.toLowerCase().indexOf(searchValue) !== -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
