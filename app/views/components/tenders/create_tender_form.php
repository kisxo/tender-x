<form action="/tenders/create" method="post" class="login-form mt-[40px] mx-auto w-4/5 p-5 mb-30">

    <div class="text-center mb-[40px] text-xl font-bold">
        <h1 class="mx-auto">Create a Tender</h1>
    </div>

    <!-- Show Errors -->
    <?php if (!empty($errors)) : ?>
        <div class="bg-gray-50 p-3 text-red-400 rounded-sm mb-6">
            <?= implode("<br/>", $errors) ?>
        </div>
    <?php endif; ?>

    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-600">Title</label>
        <input type="text" id="title" name="title" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter a title" required />
    </div>

    <div class="mb-6">
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-600">Category</label>
        <select id="category_id" name="category_id" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " required >
            <option selected>Choose a category</option>
            <?php foreach ($categories as $category): ?>
                <option value=<?= $category["id"] ?> > <?= $category["name"] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-600">Description</label>
        <textarea type="text" id="description" name="description" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter description" required></textarea>
    </div>

    <div class="mb-6">
        <label for="budget" class="block mb-2 text-sm font-medium text-gray-600">Budget</label>
        <input type="number" id="budget" name="budget" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter budget eg: 150000" required />
    </div>

    <div class="mb-6">
        <label for="deadline" class="block mb-2 text-sm font-medium text-gray-600">Deadline</label>
        <input type="date" id="deadline" name="deadline" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter deadline" required />
    </div>

    <div class="mb-6">
        <label for="location" class="block mb-2 text-sm font-medium text-gray-600">Location</label>
        <input type="text" id="location" name="location" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter location" required />
    </div>

    <button type="submit" class="my-8 text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center mb-2 ">Create</button>

</form>