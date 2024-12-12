<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-green-500">
            {{ __('Profile') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    {{-- SLICING BELUM INTEGRASI --}}
    <h2 class="text-2xl font-bold text-green-700 mb-4">User Profile</h2>
    <form id="profile-form" class="space-y-4">
        <div><label class="block font-bold mb-2">Name</label><input type="text" value="Gerry" class="w-full border rounded p-2"></div>
        <div><label class="block font-bold mb-2">Email</label><input type="email" value="gerry@gmail.com" class="w-full border rounded p-2"></div>
        <div><label class="block font-bold mb-2">Phone</label><input type="tel" value="+62 812 3456 7890" class="w-full border rounded p-2"></div>
        <div><label class="block font-bold mb-2">Address</label><input type="text" value="123 Green Street, EcoCity" class="w-full border rounded p-2"></div>
        <button type="button" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mt-4" onclick="showModal('Save Profile Changes?')">Update Profile</button>
    </form>
    <h2 class="text-2xl font-bold text-green-700 mt-8 mb-4">Reset Password</h2>
     <form id="profile-form" class="space-y-4">
        <div><label class="block font-bold mb-2">Current Password</label><input type="text" value="" class="w-full border rounded p-2"></div>
        <div><label class="block font-bold mb-2">New Password/label><input type="text" value="" class="w-full border rounded p-2"></div>
        <div><label class="block font-bold mb-2">Confirm Password/label><input type="text" value="" class="w-full border rounded p-2"></div>
        <button type="button" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mt-4" onclick="showModal('Save Profile Changes?')">Change Password</button>
    </form>
</x-app-layout>