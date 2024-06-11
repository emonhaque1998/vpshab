import Extra from "../../Extra";
import axios from "axios";
import Swal from "sweetalert2";

export default class ProductClasses extends Extra {
    constructor() {
        super();
        this.addProductFrom = document.querySelector("#addProductForm");
        this.addProductSubmitBtn = document.querySelector(
            "#addProductSubmitBtn"
        );
        this.productExtra = new Extra();
        this.deleteBtn = document.querySelectorAll("#productDelete");
        this.freshIpBtn = document.getElementById("freshIp");
        this.freshIPInput = document.getElementById("freshIPInput");
    }

    freshIPBtnChangeHandler() {
        if (this.freshIpBtn.checked) {
            this.freshIPInput.style.display = "block";
        } else {
            this.freshIPInput.style.display = "none";
        }
    }

    async addProduct() {
        this.loading(this.addProductSubmitBtn);

        const data = new FormData(this.addProductFrom);

        try {
            const response = await axios.post("add-product", data);
            if (response.status == 200) {
                this.loading(addProductSubmitBtn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(addProductSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    async deleteProduct(event) {
        try {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(
                        `all-products/${event.target.parentElement.attributes.data.value}`
                    );

                    if (response.status === 200) {
                        event.target.parentElement.parentElement.parentElement.parentElement.remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: response.data.message,
                            icon: "success",
                        });
                    }
                }
            });
        } catch (error) {
            this.toast(error.response.data.message, "error");
        }
    }
}
