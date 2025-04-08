import sys
import json
from fpdf import FPDF

def main():
    json_path = sys.argv[1]
    output_path = sys.argv[2]

    with open(json_path, 'r') as f:
        materials = json.load(f)

    pdf = FPDF()
    pdf.set_auto_page_break(auto=True, margin=10)
    pdf.add_page()
    pdf.set_font("Arial", size=10)

    pdf.set_font(style='B')
    pdf.cell(0, 10, "Materials List", ln=True, align='C')
    pdf.set_font(style='')

    for material in materials:
        for key, value in material.items():
            pdf.multi_cell(0, 8, f"{key}: {value}")
        pdf.ln(4)  # space between materials

    pdf.output(output_path)

if __name__ == '__main__':
    main()
