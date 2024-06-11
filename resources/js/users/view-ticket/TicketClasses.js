import Extra from "../../Extra";
import moment from "moment";
export default class TicketClasses extends Extra {
    constructor() {
        super();
        this.replayBtn = document.getElementById("replayBtn");
        this.cancleBtn = document.getElementById("cancleBtn");
        this.replayMessage = document.getElementById("replayMessage");
        this.replayMessageSubtmitBtn = document.getElementById(
            "replayMessageSubtmitBtn"
        );
        this.appendDataList = document.getElementById("appendDataList");
    }

    replayButtonAction() {
        if (this.replayMessage.style.display === "none") {
            this.replayMessage.style.display = "block";
        }
    }

    async storeMessage() {
        this.loading(this.replayMessageSubtmitBtn);
        const data = new FormData(this.replayMessage);

        try {
            const response = await axios.post("/view-ticket", data);
            if (response.status == 200) {
                this.loading(this.replayMessageSubtmitBtn);
                this.appendData(response.data);
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.replayMessageSubtmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    appendData(data) {
        this.appendDataList.innerHTML += `
        <div>
            <h4 class="text-light mt-5">${data.name}</h4>
            <p class="text-light"><span class="mx-2"><i class="fa-solid fa-calendar-days"></i></span> ${moment(
                data.result.created_at
            ).format("Do MMMM YYYY, h:mm a")}</p>
            <pre class="text-light bg-dark p-3" style="border-left: 5px solid tomato;">${
                data.result.message
            }</pre>
        </div>    
        `;
    }
}
