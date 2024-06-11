import Extra from "../../Extra";
import axios from "axios";

export default class PageClasses extends Extra {
    constructor() {
        super();
        this.websiteVedioForm = document.querySelector(
            "#website_page_vedio_form"
        );
        this.websiteVedioSubmitBtn = document.querySelector(
            "#website_page_vedio_submitBtn"
        );
    }

    async addVedio() {
        this.loading(this.websiteVedioSubmitBtn);

        const data = new FormData(this.websiteVedioForm);

        try {
            const response = await axios.post("/admin/page-information", data);
            if (response.status == 200) {
                this.loading(this.websiteVedioSubmitBtn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.websiteVedioSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }
}
