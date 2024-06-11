import Extra from "./../../Extra";

export default class SupportClasses extends Extra {
    constructor() {
        super();
        this.departmentSubmitForm = document.getElementById(
            "departmentSubmitForm"
        );
        this.departmentSubmitBtn = document.getElementById(
            "departmentSubmitBtn"
        );
        this.departmentList = document.getElementById("departmentList");
        this.announcementSubmitBtn = document.getElementById(
            "announcementSubmitBtn"
        );
        this.announcementSubmitForm = document.getElementById(
            "announcementSubmitForm"
        );
        this.postAnnouncementList = document.getElementById(
            "postAnnouncementList"
        );
        this.messageFromAdmin = document.getElementById("messageFromAdmin");
        this.replaySubmitBtn = document.getElementById("replaySubmitBtn");
        this.replayDiv = document.getElementById("replayAdmin");
    }

    async sendReplayForUser() {
        this.loading(this.replaySubmitBtn);
        const data = new FormData(this.messageFromAdmin);

        try {
            const response = await axios.post("/admin/signle-messages", data);

            if (response.status == 200) {
                this.loading(this.replaySubmitBtn);
                this.toast(response.data.message, "success");
                this.replayDiv.style.display = "none";
            }
        } catch (error) {
            this.loading(this.replaySubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    async addDepartment() {
        this.loading(this.departmentSubmitBtn);
        const data = new FormData(this.departmentSubmitForm);

        try {
            const response = await axios.post("support-information", data);

            if (response.status == 200) {
                this.loading(this.departmentSubmitBtn);
                this.appendDepartment(
                    response.data.result,
                    this.departmentList
                );
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.departmentSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    async postAnnouncement() {
        this.loading(this.announcementSubmitBtn);
        const data = new FormData(this.announcementSubmitForm);

        try {
            const response = await axios.post("announcement", data);

            if (response.status == 200) {
                this.loading(this.announcementSubmitBtn);
                this.appendDepartment(
                    response.data.result,
                    this.postAnnouncementList
                );
                this.toast(response.data.message, "success");
            }
        } catch (error) {
            this.loading(this.announcementSubmitBtn);
            this.toast(error.response.data.message, "error");
        }
    }

    appendDepartment(data, viewList) {
        const serial = viewList.children.length + 1;
        viewList.innerHTML += `
            <tr>
                <td>#${serial}</td>
                <td>${data.name ? data.name : data.title}</td>
                ${data.email ? `<td>${data.email}</td>` : ""}
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" onclick="deleteAnnouncement(event)" data="${
                            data.id
                        }" class="text-danger" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title=""
                            data-bs-original-title="Delete" aria-label="Delete"><i
                                class="bi bi-trash-fill"></i></a>
                    </div>
                </td>
            </tr>
        `;
    }
}
