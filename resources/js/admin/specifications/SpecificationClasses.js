import axios from "axios";
import Extra from "./../../Extra";

export default class SpecificationClasses extends Extra {
    constructor() {
        super();
        this.specificationForm = document.getElementById("specificationForm");
        this.specificationSubmitBtn = document.getElementById(
            "specificationSubmitBtn"
        );
        this.specificatonList = document.getElementById("specificatonList");
        this.removeSpecificationBtn = document.querySelectorAll(
            "#removeSpecification"
        );
    }

    async addSpecification() {
        this.loading(this.specificationSubmitBtn);
        const data = new FormData(this.specificationForm);

        try {
            const response = await axios.post("specification", data);

            if (response.status == 200) {
                this.loading(this.specificationSubmitBtn);
                this.appendSpecification(response.data.result);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.specificationSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    async deleteSpecification() {}

    appendSpecification(specification) {
        const serial = this.specificatonList.children.length + 1;
        return (specificatonList.innerHTML += `
            <tr>
                <td>#${serial}</td>
                <td>${specification.features}</td>
                <td>${specification.performance}</td>
                <td>${specification.boosters}</td>
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-danger" data="${specification.id}" onclick="deleteSpecificaion(event)"
                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="" data-bs-original-title="Delete"
                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </td>
            </tr>
        `);
    }
}
