<?php
    class SupportTicketView {
        private SupportTicket $ticket;

        public function __construct(SupportTicket $ticket) {
            $this->ticket = $ticket;
        }

        public function getView(): string {
            $ticket = $this->ticket;
            $view = '<div class="success-message">';
            $view .= '<p style="color: green;">Form submitted successfully!</p>';
            $view .= '<ul>';
            $view .= '<li><strong>Name: </strong>'.htmlspecialchars($ticket->name).'</li>';
            $view .= '<li><strong>First Name: </strong>'.htmlspecialchars($ticket->firstName).'</li>';
            $view .= '<li><strong>Email: </strong>'.htmlspecialchars($ticket->email).'</li>';
            if ($ticket->fileURL) $view .= '<li><strong>File URL: </strong>'.htmlspecialchars($ticket->fileURL).'</li>';
            $view .= '<li><strong>Description: </strong>'.htmlspecialchars($ticket->description).'</li>';
            return $view . '</ul></div>';
        }
    }
?>
