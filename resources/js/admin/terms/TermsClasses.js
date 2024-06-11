import Extra from "./../../Extra";

export default class TermsClasses extends Extra{
    constructor(){
        super();
        this.website_terms_form = document.getElementById("website_terms_form");
        this.website_terms_btn = document.getElementById("website_terms_btn");
        this.website_privacy_form = document.getElementById("website_privacy_form");
        this.website_privacy_btn = document.getElementById("website_privacy_btn");
        this.website_cookie_form = document.getElementById("website_cookie_form");
        this.website_cookie_btn = document.getElementById("website_cookie_btn");
    }

    async updateTerms(){
        this.loading(this.website_terms_btn);
        const data = new FormData(this.website_terms_form);

        try {
            const response = await axios.post("terms-condition", data);

            if (response.status == 200) {
                this.loading(this.website_terms_btn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.website_terms_btn);
            this.toast(error.response.data.message, "error");
        }
    }

    async updatePolicy(){
        this.loading(this.website_privacy_btn);
        const data = new FormData(this.website_privacy_form);

        try {
            const response = await axios.post("update-privacy-policy", data);

            if (response.status == 200) {
                this.loading(this.website_privacy_btn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.website_privacy_btn);
            this.toast(error.response.data.message, "error");
        }
    }

    async updateCookie(){
        this.loading(this.website_cookie_btn);
        const data = new FormData(this.website_cookie_form);

        try {
            const response = await axios.post("cookie-policy", data);

            if (response.status == 200) {
                this.loading(this.website_cookie_btn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.website_cookie_btn);
            this.toast(error.response.data.message, "error");
        }
    }
}
