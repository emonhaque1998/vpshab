import Extra from "../../Extra";
import Swal from "sweetalert2";

export default class UserClasses extends Extra {
    constructor() {
        super();
        this.userDeletd = document.querySelectorAll("#userDeletd");
        this.allUsers = document.getElementById("allUsers");
    }

    async deleteUser(event) {
        try {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(
                        `all-users/${event.target.parentElement.attributes.data.value}`
                    );

                    if (response.status === 200) {
                        event.target.parentElement.parentElement.parentElement.parentElement.remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: response.data.message,
                            icon: "success",
                        });
                    }
                }
            });
        } catch (error) {
            this.toast(error.response.data.message, "error");
        }
    }
}
