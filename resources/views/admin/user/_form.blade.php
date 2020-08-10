<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name',isset($user)?$user->name:null) }}" id="name" placeholder="Enter user name">
        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" value="{{ old('email',isset($user)?$user->email:null) }}" id="email" placeholder="Enter user email">
        @error('email') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter user password">
        @error('password') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" id="password" placeholder="Confirm user password">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" type="text" class="form-control" value="{{ old('phone',isset($user)?$user->phone:null) }}" id="phone" placeholder="Enter user phone">
        @error('phone') <i class="text-danger">{{ $message }}</i> @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address',isset($user)?$user->address:null) }}</textarea>
        @error('address') <i class="text-danger">{{ $message }}</i> @enderror
    </div>

    <div class="form-group">
        <label>Status</label>
        <div class="form-check ">
            <input name="status" type="radio" @if(old('status',isset($user)?$user->status:null) == 'Active') checked @endif class="form-check-input" value="Active" id="active">
            <label for="active">Active</label>
        </div>
        <div class="form-check">
            <input name="status" type="radio" @if(old('status',isset($user)?$user->status:null) == 'Inactive') checked @endif class="form-check-input" value="Inactive" id="inactive">
            <label for="inactive">Inactive</label>
        </div>
        @error('status') <i class="text-danger">{{ $message }}</i> @enderror
    </div>

</div>
