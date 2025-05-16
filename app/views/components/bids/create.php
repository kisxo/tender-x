<form action="/login" method="post" class="login-form mt-[40px] mx-auto w-4/5 max-w-lg p-5">

    <div class="text-center mb-[40px] text-3xl font-bold">
        <h1 class="mx-auto"> Place a Bid </h1>
    </div>

    <!-- Show Errors -->
    <?php if (!empty($errors)) : ?>
        <div class="bg-gray-50 p-3 text-red-400 rounded-sm mb-6">
            <?= implode("<br/>", $errors) ?>
        </div>
    <?php endif; ?>

    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-600">Tender Title</label>
        <input type="text" id="title" name="title" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Title" value="<?= $tender ? $tender->title : "" ?>"  disabled/>
    </div>

    <div class="mb-6">
        <input hidden type="number" id="tender_id" name="tender_id" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " value="<?= $tender ? $tender->id : "" ?>" required />
    </div>

    <div class="mb-6">
        <label for="bid_amount" class="block mb-2 text-sm font-medium text-gray-600">Bid Amount</label>
        <input type="number" id="bid_amount" name="bid_amount" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter budget eg: 150000" required />
    </div>

    <div class="mb-6">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-600">Message</label>
        <textarea type="text" id="message" name="message" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 "  required> </textarea>
    </div>

    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center mb-2 ">Submit Bid</button>

</form>