import Swal from "sweetalert2";

export default class Extra {
    constructor() {
        this.pageLoadingDiv = document.getElementById("cover-spin");
    }

    loading(element) {
        if (element.children[0].classList.length == 0) {
            element.children[0].classList.add("spinner-border");
            element.children[0].classList.add("spinner-border-sm");
            element.setAttribute("disabled", "");
        } else {
            element.children[0].classList.remove("spinner-border");
            element.children[0].classList.remove("spinner-border-sm");
            element.removeAttribute("disabled");
        }
    }

    toast(msg, type) {
        Swal.fire({
            icon: type,
            text: msg,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000, // Adjust the time the toast is displayed (in milliseconds)
        });
    }

    disable(...element) {
        element.forEach((items) => {
            items.setAttribute("disabled", "");
        });
    }

    enable(...element) {
        element.forEach((items) => {
            items.removeAttribute("disabled");
        });
    }

    pageLoading() {
        if (this.pageLoadingDiv.style.display == "block") {
            this.pageLoadingDiv.style.display = "none";
        } else {
            this.pageLoadingDiv.style.display = "block";
        }
    }
}
