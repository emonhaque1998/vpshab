import Extra from "./../../Extra";

export default class KnowlageFaqClasses extends Extra {
    constructor() {
        super();
        this.website_knowlegebase_submit = document.getElementById(
            "website_knowlegebase_submit"
        );
        this.website_knowlegebase_submit_btn = document.getElementById(
            "website_knowlegebase_submit_btn"
        );
        this.website_faq_submit_form = document.getElementById(
            "website_faq_submit_form"
        );
        this.website_faq_submit_btn = document.getElementById(
            "website_faq_submit_btn"
        );
    }

    async updateKnowlagebas() {
        this.loading(this.website_knowlegebase_submit_btn);
        const data = new FormData(this.website_knowlegebase_submit);

        try {
            const response = await axios.post("knowledgebase", data);

            if (response.status == 200) {
                this.loading(this.website_knowlegebase_submit_btn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.website_knowlegebase_submit_btn);
            this.toast(error.response.data.message, "error");
        }
    }

    async updateFaq() {
        this.loading(this.website_faq_submit_btn);
        const data = new FormData(this.website_faq_submit_form);

        try {
            const response = await axios.post(
                "frequently-sasked-questions",
                data
            );

            if (response.status == 200) {
                this.loading(this.website_faq_submit_btn);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.website_faq_submit_btn);
            this.toast(error.response.data.message, "error");
        }
    }
}
