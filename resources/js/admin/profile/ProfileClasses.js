import axios from "axios";
import Extra from "../../Extra";

export default class ProfileClasses extends Extra{
    constructor(){
        super();
        this.profileForm = document.getElementById("profileSubmitForm");
        this.profileSubmitBtn = document.getElementById("profile_submit_btn");
    }

    async saveProfileInformation(){
        this.loading(this.profileSubmitBtn);
        const data = new FormData(this.profileForm);

        try{
            const response = await axios.post("profile", data);
            if (response.status == 200) {
                this.loading(this.profileSubmitBtn);               
                this.toast(response.data.message, "success");
            }
        }catch(error){
            this.loading(this.profileSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }
}  