import axios from "axios";
import Extra from "./../../Extra";
export default class CountryClasses {
    constructor() {
        this.addCountryForm = document.querySelector("#countrySubmitForm");
        this.addCountrySubmitBtn = document.querySelector("#btnCountrySubmit");
        this.countryHtmlList = document.querySelector("#countryList");
        this.countryExtra = new Extra();
        this.countryList = document.querySelector("#countryList");
        this.countryEditBtn = document.querySelectorAll("#countryEditBtn");
        this.countryId = document.querySelectorAll("#countryId");
        this.countryName = document.getElementById("countryName");
        this.verticalAlign = document.getElementById("verticalAlign");
        this.horizontalAlign = document.getElementById("horizontalAlign");
        this.countryFormId = document.getElementById("countryFormId");
    }

    async editCountry(countryId){
        console.log(countryId)
        try {
            const response = await axios.get(`country/${countryId.value}`);
            if (response.status == 200) {
                this.countryName.value = response.data.returnData.name
                this.verticalAlign.value = response.data.returnData.vertical
                this.horizontalAlign.value = response.data.returnData.horizontal
                this.countryFormId.value = countryId.value;
            }
        } catch (error) {
            this.countryExtra.toast(error.response.data.message, "error");
        }
    }

    appentCountry(state) {
        const serial = this.countryList.children.length + 1;
        return (this.countryList.innerHTML += `
        <tr>
            <td>#${serial}</td>
            <td>${state.name}</td>
            <td>54</td>
            <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="javascript:;" class="text-danger" data="${state.id}" onclick="deleteCountry(event)"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="" data-bs-original-title="Delete"
                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                </div>
            </td>
        </tr>
    `);
    }

    async addState() {
        this.countryExtra.loading(this.addCountrySubmitBtn);

        const data = new FormData(this.addCountryForm);

        try {
            const response = await axios.post("country", data);
            if (response.status == 200) {
                this.countryExtra.loading(this.addCountrySubmitBtn);
                this.countryExtra.toast(response.data.message, "success");
                if(this.countryFormId.value === ""){
                    this.appentCountry(response.data.returnData);
                }else{
                    this.countryName.value = "";
                    this.verticalAlign.value = "";
                    this.horizontalAlign.value = "";
                    this.countryFormId.value = "";
                }
            }
        } catch (error) {
            this.countryExtra.loading(this.addCountrySubmitBtn);
            this.countryExtra.toast(error.response.data.message, "error");
        }
    }

    loadWorking(){
        this.countryName.value = "";
        this.verticalAlign.value = "";
        this.horizontalAlign.value = "";
        this.countryFormId.value = "";
    }
}
