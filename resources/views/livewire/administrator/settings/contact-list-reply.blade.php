<div class="h-100">
    <style>
        .boxShadow {
            margin: 10px auto;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .customTable td,
        .customTable th {
            padding: 2px;
        }

        .ck-content.ck-editor__editable {
            min-height: 200px !important;
        }
    </style>

    <h3 style="padding-top: 10px;padding-left: 10px;">
        Contact reply:
    </h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col" style="margin-left: auto;margin-right:auto">

            <!-- datatablecl -->
            <div class="boxShadow">

                <div class="p-1">
                    <table class="table w-100 table-bordered customTable">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $contact->fullname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td>{{ $contact->mobile }}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td>{{ $contact->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Contact Reason</th>
                                <td>{{ $contact->reason_contact }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Message</th>
                                <td>{{ $contact->message }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form class="mt-2 row gap-3" wire:submit.prevent="save">
                    <div wire:ignore>
                        <textarea wire:model="message"
                            class="form-control"
                            style="min-height: 300px;"
                            rows="10"
                            name="message"
                            id="message">
                        </textarea>
                    </div>

                    @error('message')<div class="text-danger">{{ $message }}</div>@enderror

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button class="btn btn-primary">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>&nbsp;
                                Sending email ...
                            </span>
                            <span wire:loading.remove>Send Reply</span>
                        </button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
@push('custom-scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor.create(document.querySelector('#message'), {

        })
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('message', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endpush