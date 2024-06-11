import ProfileClasses from "./ProfileClasses";

const profile = new ProfileClasses();


// Save profile information
if(profile.profileForm){
    profile.profileForm.addEventListener("submit", e => {
        e.preventDefault();
        profile.saveProfileInformation();
    })
}