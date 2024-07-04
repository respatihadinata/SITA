from locust import HttpUser, TaskSet, task, between

class UserBehavior(TaskSet):
    @task
    def load_index(self):
        self.client.get("/index.html")

    @task
    def load_login_page(self):
        self.client.get("/page-login.html")

    @task
    def perform_login(self):
        response = self.client.post("/page-login.html", data={"nim": "3312201027", "password": "nata"})
        assert response.status_code == 200, "Failed to login"

    @task
    def load_page_beranda(self):
        self.client.get("/page-beranda.html")

    @task
    def load_page_tugas_akhir_form(self):
        # Accessing the form page to get CSRF token if necessary
        response = self.client.get("/page-tugas-akhir.html")
        csrf_token = response.cookies.get('csrftoken', '')

        # Simulating form submission
        form_data = {
            'dosen': 'Sudra',
            'judul': 'Judul Test locust',
            'status': 'On Going',
            'file': open('HTML/dummy.pdf', 'rb'),  # Example file upload
            'deskripsi': 'Test locust',
            'csrfmiddlewaretoken': csrf_token  # Include CSRF token if required
        }

        # Submitting the form data
        response = self.client.post("/tugas-akhir-api.php", files=form_data)
        assert response.status_code == 200, "Failed to submit tugas akhir form"

    @task
    def load_page_logbook_form(self):
        # Accessing the logbook form page
        self.client.get("/page-logbook.html")

    @task
    def submit_logbook_entry(self):
        # Simulating logbook form submission
        logbook_data = {
            'tahapan': 'Planning',
            'deskripsi': 'Mengerjakan perencanaan sistem',
            'output': 'Dokumen SRS',
            'tanggalmulai': '2024-07-04',  # Adjust with appropriate date format
            'tanggalselesai': '2024-07-05',  # Adjust with appropriate date format
            'persentase': 50
        }

        response = self.client.post("/logbook-api.php", data=logbook_data)
        assert response.status_code == 200, "Failed to submit logbook entry"

    @task
    def load_page_daftar_dosen(self):
        self.client.get("/page-daftar-dosen.html")

    @task
    def load_page_jadwal_sidang(self):
        self.client.get("/page-jadwal-sidang.html")

class WebsiteUser(HttpUser):
    tasks = [UserBehavior]
    wait_time = between(1, 5)
