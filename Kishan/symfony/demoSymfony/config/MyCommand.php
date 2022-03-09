<?php
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

class MyCommand extends Command
{   /**
    *@Route("/con")
    */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$output instanceof ConsoleOutputInterface) {
            throw new \LogicException('This command accepts only an instance of "ConsoleOutputInterface".');
        }

        $section1 = $output->section();
        $section2 = $output->section();

        $section1->writeln('Hello');
        $section2->writeln('World!');
        // Output displays "Hello\nWorld!\n"

        // overwrite() replaces all the existing section contents with the given content
        $section1->overwrite('Goodbye');
        // Output now displays "Goodbye\nWorld!\n"

        // clear() deletes all the section contents...
        $section2->clear();
        // Output now displays "Goodbye\n"

        // ...but you can also delete a given number of lines
        // (this example deletes the last two lines of the section)
        $section1->clear(2);
        // Output is now completely empty!

        return 0;
    }
}
?>