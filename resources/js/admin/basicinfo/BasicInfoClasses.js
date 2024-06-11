import Extra from "../../Extra";
import axios from "axios";

export default class BasicInfoClasses {
    constructor() {
        this.websiteInfoForm = document.querySelector("#website_info_form");
        this.websiteFormSubmitBtn = document.querySelector(
            "#website_info_submit_btn"
        );

        this.bannerInfoForm = document.querySelector("#website_banner_form");
        this.bannerInfoFormBtn = document.querySelector(
            "#website_banner_submit_btn"
        );
        this.InfoExtra = new Extra();
    }

    async setBasicInfo() {
        this.InfoExtra.loading(this.websiteFormSubmitBtn);

        const data = new FormData(this.websiteInfoForm);

        try {
            const response = await axios.post("basic-information", data);
            if (response.status == 200) {
                this.InfoExtra.loading(this.websiteFormSubmitBtn);
                this.InfoExtra.toast(response.data.message, "success");
            }
        } catch (error) {
            this.InfoExtra.loading(this.websiteFormSubmitBtn);
            this.InfoExtra.toast(error.response.data.message, "error");
        }
    }

    async setBannerInformation() {
        this.InfoExtra.loading(this.bannerInfoFormBtn);

        const data = new FormData(this.bannerInfoForm);

        try {
            const response = await axios.post("banner-information", data);
            if (response.status == 200) {
                this.InfoExtra.loading(this.bannerInfoFormBtn);
                this.InfoExtra.toast(response.data.message, "success");
            }
        } catch (error) {
            this.InfoExtra.loading(this.bannerInfoFormBtn);
            this.InfoExtra.toast(error.response.data.message, "error");
        }
    }
}
