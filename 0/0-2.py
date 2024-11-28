from re import findall

numbers_map = dict(one=1, two=2, three=3, four=4, five=5, six=6, seven=7, eight=8, nine=9)
total = 0
f = open('input.txt', 'r')
for line in f:
    line_matches = findall('(?=(\d|one|two|three|four|five|six|seven|eight|nine))', line)
    first_match = line_matches[0]
    last_match = line_matches[-1]

    first_int = 0
    try:
        first_int = int(first_match)
    except ValueError:
        first_int = numbers_map[first_match]

    try:
        last_int = int(last_match)
    except ValueError:
        last_int = numbers_map[last_match]

    total += int(str(first_int) + str(last_int))
f.close()
print(total)
