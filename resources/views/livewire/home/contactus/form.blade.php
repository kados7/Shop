<div>
    <div class="row m-5">
        <div class="col-md-6 rounded p-5" style="background: rgba(244, 255, 142, 0.301)">
            <h5 class="text-danger">آدرس: </h5> {{$setting->address}}
            <h5 class="text-danger">شماره تلفن :</h5> {{$setting->telephone}}
            <h5 class="text-danger">شماره تلفن :</h5> {{$setting->telephone2}}

        </div>
        <div class="col-md-6">
            <!-- Default form contact -->
            <form wire:submit.prevent="submit_form" class="border border-light p-5">

                <p class="h4 mb-4">ارتباط با ما</p>
                @include('admin.sections.errors')

                <!-- Name -->
                <input wire:model.defer="name" type="text" class="form-control mb-4" placeholder="نام">

                <!-- Email -->
                <input wire:model.defer="email" type="email" class="form-control mb-4" placeholder="ایمیل">
                <!-- PHONE -->
                <input wire:model.defer="subject" class="form-control mb-4" placeholder="موضوع">


                <!-- Message -->
                <div class="form-group">
                    <textarea wire:model.defer="text" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="پیام"></textarea>
                </div>

                {{-- <!-- Copy -->
                <div class="custom-control custom-checkbox mb-4">
                    <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
                    <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                </div> --}}

                <!-- Send button -->
                <button class="btn btn-outline-info my-4" type="submit">ارسال</button>

            </form>
            <!-- Default form contact -->
        </div>
    </div>


</div>
