<?php

namespace App\Http\Livewire\Contact;

use App\Events\LeadCreatedEvent;
use App\Utils\Enums\ProjectStatusEnum;
use App\Utils\SendSms;
use Appsorigin\Leads\Models\Lead;
use Appsorigin\Plots\Models\Project;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use function PHPUnit\Framework\isFalse;


class BookSiteVisit extends Component implements HasForms
{
    use InteractsWithForms;

    public $date;

    public $name;

    public $project;

    public $branch;
    public $phone_number;

    public Project|null $page = null;

    protected function getFormSchema(): array
    {

        return [
            Grid::make(1)
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('phone_number')
                        ->placeholder('07xx xxx xxx')
                        ->required()
                        ->minLength(10)
                        ->maxLength(10)
                        ->tel()
                        ->numeric(),
                    DatePicker::make('date')
                        ->helperText('When will you view the plots?')
                        ->required(),
                    TextInput::make('branch')
                        ->label('Location')
                        ->helperText("Location Interested")
                        ->required(fn(): bool => !filled($this->page))
                        ->hidden(fn(): bool => filled($this->page))
                ])->inlineLabel(),
        ];
    }

    public function bookVisit()
    {

        $data = $this->form->getState();

        $phone = $data['phone_number'];

        $message = $data['name'] . " Booked a visit, Phone Number:  {$phone} on {$data['date']}";

        $branch = "";

        if (!is_null($this->page)) {

            $message .= " to view {$this->page->title}";

            $branch = $this->page
                ->branches()
                ->implode('name', ',');
        }
        if (isset($data['branch'])) {

            $message .= " to view {$data['branch']} projects";

            $branch = $data['branch'];
        }

        $message .= " -: $branch";

        try {

            if (str($this->phone_number)->length() < 10)
            {
                throw  new \Exception("Phone Number not valid");
            }
            if (str($this->phone_number)->length() > 10)
            {
                throw  new \Exception("Phone Number not valid");
            }

            $lead = Lead::create([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'date' => Carbon::parse($data['date']),
                'page' =>  $branch,
            ]);

            /**
             * post lead to crm as website source
             */
            Http::post('https://shekinahhub.com/api/v1/crm/create', [
                'phone_number' => $data['phone_number'],
                'source' => "website",
                'name' =>  $lead->name,
                'description' => "{$lead->name} Booked a visit, {$data['date']} to view {$branch} projects"
            ]);


            event(new LeadCreatedEvent(
                lead: $lead,
                branch: $branch,
                phone: $data['phone_number'],
                name: $data['name'],
                message: $message,
            ));


            $this->fill([
                'phone_number' => "",
                'name' => null,
            ]);


            return Notification::make()
                ->success()
                ->body("We have received your request")
                ->send();

        } catch (\Exception $e) {

            return Notification::make()
                ->danger()
                ->title('Something went wrong')
                ->body($e->getMessage())
                ->send();
        }
        //  dd($response->json());

    }

    public function render()
    {
        return view('livewire.contact.book-site-visit');
    }
}
