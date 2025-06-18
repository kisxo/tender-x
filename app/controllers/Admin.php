<?php


class Admin
{
    use Controller;

    public function index()
    {
        adminRequired();
        $user = new User;
        $tender = new Tender;
        $bid = new Bid;
        $category = new Category;
        try {
            $data["stats"] = [
                "users" => $user->query("SELECT COUNT(*) AS total FROM users")[0]->total,
                "tenders" => $tender->query("SELECT COUNT(*) AS total FROM tenders")[0]->total,
                "bids" => $bid->query("SELECT COUNT(*) AS total FROM bids")[0]->total,
                "categories" => $category->query("SELECT COUNT(*) AS total FROM categories")[0]->total,
                "open_tenders" => $tender->query("SELECT COUNT(*) AS total_open_tenders  FROM tenders WHERE status = 'open'")[0]->total_open_tenders
            ];

        } catch (Exception $e) {

        }

        $this->view("admin", $data);
    }

    public function users()
    {
        adminRequired();
        $user = new User;
        $data["limit"] = 10;

        // Get the current page from the URL, default is 1
        $data["page"] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($data["page"] < 1) $data["page"] = 1;
        $data["offset"] = ($data["page"] - 1) * $data["limit"];

        // Fetch total number of users
        $data["totalUsers"] = $user->query("SELECT COUNT(*) AS total_users  FROM users")[0]->total_users;
        $data["totalPages"] = ceil($data["totalUsers"] / $data["limit"]);

        try {
            $data["users"] = $user->query("SELECT * FROM users ORDER BY id DESC LIMIT :limit OFFSET :offset", [
                "limit" => $data["limit"],
                "offset" => $data["offset"]
            ]);
        } catch (Exception $e) {

        }
        $this->view("admin.users", $data);
    }

    public function users_edit($id = "")
    {
        adminRequired();
        $user = new User;

        // post method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $role = $_POST['role'] ?? 'user';
            $status = $_POST['status'] ?? 'active';
            $password = $_POST['password'] ?? '';

            // Validate inputs
            if (empty($name) || empty($email)) {
                redirect("/admin/users_edit/{$id}");
            }

            // Prepare data for update
            $updateArr = [
                "name" => $name,
                "email" => $email,
                "role" => $role,
                "status" => $status,
            ];

            if (!empty($password)) {
                $updateArr["password"] = sha1($password);
            }

            // Update user
            try {
                $user->update($id, $updateArr);
                redirect("/admin/users");
            } catch (Exception $e) {
                show("Error updating user: " . $e->getMessage());
            }
        }


        try {
            $data["user"] = $user->query("SELECT * FROM users WHERE id = :id", [
                "id" => $id
            ])[0];
        } catch (Exception $e) {

        }

        if (empty($id) || !is_numeric($id)) {
            redirect("/admin/users");
        }
        
        if (empty($data["user"])) {
            redirect("/admin/users");
        }

        $this->view("admin.users.edit", $data);
    }

    public function tenders()
    {
        adminRequired();
        $tender = new Tender;
        $data["limit"] = 10;

        // Get the current page from the URL, default is 1
        $data["page"] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($data["page"] < 1) $data["page"] = 1;
        $data["offset"] = ($data["page"] - 1) * $data["limit"];

        // Fetch total number of tenders
        $data["totalTenders"] = $tender->query("SELECT COUNT(*) AS total_tenders  FROM tenders")[0]->total_tenders;
        $data["totalPages"] = ceil($data["totalTenders"] / $data["limit"]);

        try {
            $data["tenders"] = $tender->query("SELECT * FROM tenders ORDER BY id DESC LIMIT :limit OFFSET :offset", [
                "limit" => $data["limit"],
                "offset" => $data["offset"]
            ]);
        } catch (Exception $e) {

        }
        $this->view("admin.tenders", $data);
    }
}