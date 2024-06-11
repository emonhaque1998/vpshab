import axios from "axios";
import Extra from "../../Extra";
import AppentCategory from "./AppentCategory";

export default class CategoryClasses {
    constructor() {
        this.categoryForm = document.querySelector("#categorySubmitForm");
        this.categoryExtra = new Extra();
        this.appentCategory = new AppentCategory();
        this.categoryNameField = document.querySelector("#categoyName");
        this.categorySubmitBtn = document.querySelector("#btnCategorySubmit");
        this.categoryUpdateSubmitForm = document.querySelector(
            "#categoryUpdateSubmitForm"
        );
        this.deleteCategory = document.querySelectorAll("#deleteCategory");
    }

    async storeCategory(addCategorySubmitBtn) {
        this.categoryExtra.loading(addCategorySubmitBtn);

        const data = new FormData(this.categoryForm);

        try {
            const response = await axios.post("category", data);
            if (response.status == 200) {
                this.categoryExtra.loading(addCategorySubmitBtn);

                this.categoryExtra.toast(response.data.message, "success");
                this.appentCategory.appendCategoryHtml(
                    response.data.returnData
                );
            }
        } catch (error) {
            this.categoryExtra.loading(addCategorySubmitBtn);
            this.categoryExtra.toast(error.response.data.message, "error");
        }
    }

    async viewCategory(event) {
        const slug = event.target.parentElement.attributes["data"].value;
        try {
            const response = await axios.get(`category/${slug}`);
            if (response.status == 200) {
                this.categoryNameField.value =
                    response.data.returnData.category_name;

                this.categoryExtra.disable(
                    this.categoryNameField,
                    this.categorySubmitBtn
                );
            }
        } catch (error) {
            this.categoryExtra.toast(error.response.data.message, "error");
        }
    }

    async deleteCategory(){

    }

}
