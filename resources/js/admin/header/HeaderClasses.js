import Extra from "../../Extra";

export default class HeaderClasses extends Extra {
    constructor() {
        super();
        this.logoutForm = document.querySelector("#logout_form");
        this.logutBtn = document.querySelector("#logout_submit");
    }

    logOutRequest() {
        this.logoutForm.submit();
    }
}
