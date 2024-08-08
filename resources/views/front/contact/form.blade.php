<div class="row">
    @if (session()->has('message'))
        <div class="col-12 col-md-6 mx-auto m-2">
            <div class="alert alert-light border-0 border-radius__60 text-center" role="alert">
                <span class="text__green"> {{ session('message') }}</span>
            </div>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="col-12 col-md-6 mx-auto m-2">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="col-12 col-md-12 mx-auto">
    </div>
    <div class="col-12 col-md-6 mx-auto">
        <div class="card card__getintouch border-0 bg__grey1 border-radius__60 m-0 mb-3 mt-3">
            <h3 class="h3 fw-bold text__dark mb-0">{{ __('Any question or remarks? Get in touch with us.') }}</h3>
            <form class="row row-cols-1 input-group w-auto pt-5 pb-3 g-3" action="{{ route('contact.store') }}"
                  method="post">
                @csrf

                <div class="col">
                    <div class="input-group has-validation">
                        <div class="form-floating is-invalid">
                            <input class="form-control form__input @error('name') is-invalid @enderror"
                                   id="floatingInputGroup1"
                                   type="text"
                                   placeholder="{{ __('Full name') }}"
                                   name="name"
                                   value="{{ old('name') }}"/>
                            <label for="floatingInputGroup1">{{ __('Full name') }}</label>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-group has-validation">
                        <div class="form-floating is-invalid">
                            <input class="form-control form__input @error('email') is-invalid @enderror" id="floatingInputGroup2" type="text"
                                   placeholder="{{ __('Email') }}"
                                    name="email"
                                   value="{{ old('email') }}"/>
                            <label for="floatingInputGroup2">{{ __('Email') }}</label>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-group has-validation">
                        <div class="form-floating is-invalid">
                            <input class="form-control form__input @error('phone') is-invalid @enderror" id="floatingInputGroup3" type="text"
                                   placeholder="{{ __('Phone') }}"
                                    name="phone"
                                    value="{{ old('phone') }}"/>
                            <label for="floatingInputGroup3">{{ __('Phone') }}</label>
                        </div>
                        @error('phone')
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control form__input" name="message" id="floatingTextarea4"
                                  placeholder="{{ __('Your message') }}"
                                  style="height: 100px">
                            {{ old('phone') }}
                        </textarea>
                        <label for="floatingTextarea4">{{ __('Your message') }}</label>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <button type="submit" class="btn btn-primary border-radius__50 mt-2">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
