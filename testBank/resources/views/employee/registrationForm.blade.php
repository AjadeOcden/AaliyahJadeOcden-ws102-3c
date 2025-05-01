

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                            <label>Fullname</label>
                                <input id="emp_name" type="text" name="emp_name" value="{{ old('emp_name') }}" required autofocus>

                                @error('emp_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label>email address</label>
                                <input id="emp_email" type="email" name="emp_email" value="{{ old('emp_email') }}" required>

                                @error('emp_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>password</label>
                                <input id="emp_password" type="password" name="emp_password" required>

                                @error('emp_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                                <button type="submit">
                                    register
                                </button>
                           
                    </form>
                    <a href="/login">login</a>
