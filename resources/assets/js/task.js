export default function taskApp() {
    return {
        tasks: [],
        currentTask: { id: null, title: '', description: '', user_id: '' },
        showModal: false,
        editMode: false,

        fetchTasks() {
            axios.get('/api/tasks').then(res => this.tasks = res.data);
        },

        openTaskModal(task = null) {
            this.editMode = !!task;
            this.currentTask = task ? { ...task } : { id: null, title: '', description: '', user_id: '' };
            this.showModal = true;
        },

        saveTask() {
            let request = this.editMode ? axios.put(`/api/tasks/${this.currentTask.id}`, this.currentTask) : axios.post('/api/tasks', this.currentTask);
            request.then(() => {
                this.fetchTasks();
                this.showModal = false;
            });
        },

        deleteTask(id) {
            if (confirm('Are you sure?')) {
                axios.delete(`/api/tasks/${id}`).then(() => this.fetchTasks());
            }
        },

        init() {
            this.fetchTasks();
        }
    };
}
