namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $tabSelected = 1; // Default to the first tab

    public function render()
    {
        return view('livewire.home');
    }
}