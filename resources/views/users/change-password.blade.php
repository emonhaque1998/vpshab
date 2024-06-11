<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">Change Password</h3>

        <form id="changePasswordSubmit" class="mt-5">
            @csrf

            <div class="mb-3">
                <label for="pws" class="form-label text-light">Old Password</label>
                <input type="password" class="form-control" id="pws" name="oldPass" placeholder="Enter Old Password">
            </div>
            <div class="mb-3">
                <label for="newPwd" class="form-label text-light">New Password</label>
                <input type="password" class="form-control" id="newPwd" name="newPwd"
                    placeholder="Enter New Password">
            </div>
            <div class="mb-3">
                <label for="retypePwd" class="form-label text-light">Retype Password</label>
                <input type="password" class="form-control" id="retypePwd" name="newPwd_confirmation"
                    placeholder="Enter Confrom Password">
            </div>
            <div class="submitButtonForInformation mt-3">
                <x-submit btnId="changePasswordBtn" btnText="Save Changes" />
            </div>
        </form>
    </div>
</x-user-layout>
