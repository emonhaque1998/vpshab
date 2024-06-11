import UserClasses from "./UsersClasses";

const userDetails = new UserClasses();

if (userDetails.userDeletd) {
    console.log(userDetails.userDeletd);
    userDetails.userDeletd.forEach((edit) => {
        edit.addEventListener("click", (e) => {
            e.preventDefault();
            userDetails.deleteUser(e);
        });
    });
}
