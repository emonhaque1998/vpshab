import axios from "axios";
import Extra from "../../Extra";

export default class AllProductClasses extends Extra {
    constructor() {
        super();
        this.allProductCetegorySelect = document.getElementById(
            "allProductCetegorySelect"
        );
        this.allProuctBody = document.getElementById("allProuctBody");
        this.ispSubmitForm = document.getElementById("emonhaque");
        this.ispSubmitBtn = document.getElementById("ispSubmitBtn");
    }

    async addIsp() {
        this.loading(this.ispSubmitBtn);

        const data = new FormData(this.ispSubmitForm);

        try {
            const response = await axios.post("isp", data);
            if (response.status == 200) {
                this.loading(ispSubmitBtn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(ispSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    async categoryWiseShowingProduct(event) {
        try {
            const response = await axios.get(
                `all-products/${event.target.value}/edit`
            );

            if (response.status === 200) {
                this.appendCetegoryWishProductInTable(response.data.result);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.toast(error.response.data.message, "error");
        }
    }

    appendCetegoryWishProductInTable(data) {
        data.forEach((item) => {
            this.allProuctBody.innerHTML = `<tr>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                </div>
            </td>
            <td class="productlist">
                <a class="d-flex align-items-center gap-2" href="#">
                    <div>
                        <h6 class="mb-0 product-title">${item.title}</h6>
                    </div>
                </a>
            </td>
            <td><span>${item.currency} ${item.monthly_price}.00</span></td>
            <td>
                <span
                    class="badge rounded-pill bg-${
                        item.status === "published" ? "success" : "danger"
                    }">${item.status}</span>
            </td>
            <td><span>5-31-2020</span></td>
            <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="/admin/products/all-products/${item.slug}"
                        class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="" data-bs-original-title="View detail" aria-label="Views"><i
                            class="bi bi-eye-fill"></i></a>
                    <a href="/admin/products/edit/single-product/${
                        item.slug
                    }" class="text-warning" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                    <a href="javascript;;"
                        data=${
                            item.slug
                        } id="productDelete" class="text-danger" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                </div>
            </td>
        </tr>`;
        });
    }
}
