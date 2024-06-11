import Extra from "../../Extra";
import axios from "axios";

export default class MapClasses extends Extra {
    constructor() {
        super();
        this.websiteMapForm = document.querySelector("#website_map_form");
        this.websiteMapInformationSubmit = document.querySelector(
            "#website_map_submit"
        );
    }

    async addMapInfo() {
        this.loading(this.websiteMapInformationSubmit);

        const data = new FormData(this.websiteMapForm);

        try {
            const response = await axios.post("map-information", data);
            if (response.status == 200) {
                this.loading(this.websiteMapInformationSubmit);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(websiteMapInformationSubmit);
            this.toast(error.response.data.message, "error");
        }
    }
}
