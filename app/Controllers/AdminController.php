<?php 

class AdminController {

    public function index() {
        require_once VIEWS_PATH . 'dashboard.php';
    }

    public function supplier() {
        require_once VIEWS_PATH . 'supplier.php';
    }

    public function contract() {
        require_once VIEWS_PATH . 'contract.php';
    }

    public function detailTransaction() {
        require_once VIEWS_PATH . 'detail-transaction.php';
    }

    public function progressEvaluation() {
        require_once VIEWS_PATH . 'progress-evaluation.php';
    }

    public function report() {
        require_once VIEWS_PATH . 'report.php';
    }

    public function sendNotification() {
        require_once VIEWS_PATH . 'send-notification.php';
    }

    public function transactionHistory() {
        require_once VIEWS_PATH . 'transaction-history.php';
    }
}