# TODO: Add Flash Success and Alert on Registration

- [x] Update app/Http/Controllers/Auth/RegisteredUserController.php: Change the redirect in store() method to redirect()->back()->with('success', 'Akun berhasil dibuat!');
- [x] Update resources/views/auth/register.blade.php: Add JavaScript alert code to display alert when session('success') exists.
