export default function planApp() {
    return {
        plans: [],
        currentPlan: { id: null, name: '', details: '' },
        showModal: false,
        editMode: false,

        fetchPlans() {
            axios.get('/api/plans').then(res => this.plans = res.data);
        },

        openPlanModal(plan = null) {
            this.editMode = !!plan;
            this.currentPlan = plan ? { ...plan } : { id: null, name: '', details: '' };
            this.showModal = true;
        },

        savePlan() {
            let request = this.editMode ? axios.put(`/api/plans/${this.currentPlan.id}`, this.currentPlan) : axios.post('/api/plans', this.currentPlan);
            request.then(() => {
                this.fetchPlans();
                this.showModal = false;
            });
        },

        deletePlan(id) {
            if (confirm('Are you sure?')) {
                axios.delete(`/api/plans/${id}`).then(() => this.fetchPlans());
            }
        },

        init() {
            this.fetchPlans();
        }
    };
}
